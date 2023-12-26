
if (localStorage.getItem('description') !== null){
   document.querySelector('.descr').innerHTML = localStorage.getItem('description')
}
document.querySelector('.descr').addEventListener('keydown', ev => {
    localStorage.setItem('description', document.querySelector('.descr').innerHTML.trim())
})