// Get modal element
var modal = document.getElementById('modalBox');
// Get open modal button
var modalBtn = document.querySelectorAll('#modal');
// Get close button
var closeBtn = document.getElementsByClassName('close')[0];
// Listen for open click
for(let i=0; i<modalBtn.length; i++){
    modalBtn[i].addEventListener('click', openModal);
}
 
// Listen for close click
closeBtn.addEventListener('click', closeModal);
 
// Listen for outside click
window.addEventListener('click', outsideClick);
 
 
// Function to open modal
function openModal(){
    modal.style.display = 'block';
 
}
 
// Function to close modal
function closeModal(){
    modal.style.display = 'none';
 
}
 
// Function to close modal if outside click
function outsideClick(e){
    if(e.target == modal){
        modal.style.display = 'none';
    }
 
}