var closeModalP = document.querySelector('#p_close_modal');
var closeModalC = document.querySelector('#c_close_modal');
var closeModalOt = document.querySelector('#ot_close_modal');
var openModalPd = document.querySelector('#pro_edit_pd');
var openModalC = document.querySelector('#pro_edit_c');
var openModalOt = document.querySelector('#pro_edit_ot');
var modalPd = document.querySelector('#personal_detail');
var modalC = document.querySelector('#contact_detail');
var modalOt = document.querySelector('#other_detail');


openModalPd.addEventListener('click',()=>{
    modalPd.classList.add('modal-active');
});
openModalC.addEventListener('click',()=>{
    modalC.classList.add('modal-active');
});
openModalOt.addEventListener('click',()=>{
    modalOt.classList.add('modal-active');
});

closeModalP.addEventListener('click',()=>{
    modalPd.classList.remove('modal-active');
});
closeModalC.addEventListener('click',()=>{
    modalC.classList.remove('modal-active');
})

closeModalOt.addEventListener('click',()=>{
    modalOt.classList.remove('modal-active');
})






