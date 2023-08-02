const wrapper = document.querySelector('.wrapper');
const adminButton = document.querySelector('#adminButton');
const trButton = document.querySelector('#trButton');
const stdButton = document.querySelector('#stdButton');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnLogin-popup');
const iconClose = document.querySelector('#iconClose');

adminButton.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
  });
  trButton.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
  });
  stdButton.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    document.querySelector('.student-login').classList.add('active');
});
registerLink.addEventListener('click', ()=> {
    wrapper.classList.add('active');
});
loginLink.addEventListener('click', ()=> {
    wrapper.classList.remove('active');
});
btnPopup.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});
iconClose.addEventListener('click', ()=> {
    wrapper.classList.remove('active-popup');
});//Action event