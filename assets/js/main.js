let btn_add_post = document.querySelector('.btn-insert-posts');
let btn_add_close = document.querySelector('.form-add-js .btn-close');

btn_add_post.addEventListener('click', function(e){
    e.preventDefault();
    document.querySelector('.form-add-js').classList.add('active-modal-form-add');
});


btn_add_close.addEventListener('click', (e) => {
    e.preventDefault();
    document.querySelector('.form-add-js').classList.toggle('active-modal-form-add');
});