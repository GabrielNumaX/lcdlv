$(document).ready(function() {


    //THIS IS DEBOUNCE FUNCTION COPIED FROM Wes Bos VIDEO 13  
    function debounce(func, wait = 20, inmediate = true)  {
    
        var timeout;
    
        return function() {
    
            var context = this, args = arguments;
    
    
            var later = function() {
        
            timeout = null;
    
            if(!inmediate) func.apply(context, args);
            
            };
    
            var callNow = inmediate && !timeout;
    
            clearTimeout(timeout);
    
            timeout = setTimeout(later, wait);
    
            if(callNow) func.apply(context, args);

        };

  }; //end debounce function

    //this is to remove aside position: fixed 
    //and show footer on scroll to bottom
    function showFooter() {

        let windowPos = $(window).scrollTop() + $(window).height() + $('#footer').height();

        const footerFixPos = $(document).height() - $('#footer').height(); //5800

        // console.log('window ' + windowPos);

        // console.log('footer ' + footerFixPos);

        if(windowPos > footerFixPos) {

            // console.log('if saca show');

            $('#aside').removeClass('aside-show');

            $('#aside').addClass('aside-no-show');

        }
        else if (windowPos < footerFixPos) {

            // console.log('else saca no show');
        
            $('#aside').removeClass('aside-no-show');

            $('#aside').addClass('aside-show');
            
        }  
    }

    window.addEventListener('scroll', debounce(showFooter));


}); //end JQuery