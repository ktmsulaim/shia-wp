$(function(){
    const mainNav = $('#main-nav');
    const search = mainNav.find('.search');
    const searchTrigger = search.find('#searchTrigger');
    const searchCloseTrigger = search.find('#searchFormClose');
    const searchFormWrapper = search.find('#searchFormWrapper');
    const searchForm = searchFormWrapper.find('#searchForm');
    const searchInput = searchForm.find('input');
    let isOpen = false;

    // Hide wrapper initially
    searchFormWrapper.hide()

    // Bind click function on search trigger
    search.click(openSearchForm)

    // Close search form
    searchCloseTrigger.click(closeSearchForm)
    
    function openSearchForm(e) {
        e.stopImmediatePropagation();

        if($(e.target).is('input')) {
            return;
        }

        mainNav.css({'overflow':'hidden'});
        searchFormWrapper.show().animate({'top': '50%'});
        
       clearInput();
        
        searchInput.focus();
        

        isOpen = true;
    }

    function closeSearchForm(e) {
        e.stopImmediatePropagation();
        
        searchFormWrapper.animate({'top': '-100px'}, 400, 'swing', function(){
            mainNav.css({'overflow':'unset'});
            $(this).hide();
        });
        
        isOpen = false;
    }

    // Bind keyboard shortcuts    
    Mousetrap.bind('esc', closeSearchForm);

    function clearInput() {
        searchInput.empty();
        searchInput.val('');
    }
})