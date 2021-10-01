const navSite=()=>{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.menu');
    const navLinks = document.querySelectorAll('.menu a');

    burger.addEventListener('click',()=>{

        nav.classList.toggle('show');
       
        burger.classList.toggle('toggle');
        // navLinks.forEach((link,index)=>{
            if(nav.style.animation ){
                nav.style.animation = ''
            }else{
            nav.style.animation = `navLinkFade  .5s`;
        //         link.style.animation = `navLinkFade  .5s ease  ${index  + 0.3}s forward`;
            }

        //     console.log(link);
        // });
        
    });
}


navSite();