import {listenerComplexity, check, exitToMain} from "./helperJS/handlers.js";

try {
    const wrapper = document.querySelector('#wrapper');
    const btnCheck = document.querySelector('.check');
    const btnExit = document.querySelector('.exit');
    const container = document.querySelector('.container-sudoku');
    const sessionValue = sessionStorage.getItem(sessionStorage.key(0));

    if(wrapper){

        [...wrapper.children].forEach((value) => {
            value.addEventListener('click',listenerComplexity)
        })
    }

    btnCheck.addEventListener('click', () => {
        let bool = check(sessionValue);
        let audioWin = new Audio();
        audioWin.src = "https://zvukitop.com/wp-content/uploads/2021/03/3zvuk-pobedy-we3d.mp3?_=22";
        return bool && (document.querySelector('.info').classList.add("animation-win"),audioWin.play());
    });

    [...container.children].forEach(value => value.addEventListener('input',(evt) => {

            evt.currentTarget.value.length > 1 && parseInt(evt.currentTarget.value) > parseInt(sessionValue)
                ? evt.currentTarget.value = ""
                : evt.currentTarget.value
    }));

    btnExit.addEventListener('click', exitToMain);

}catch (e) {
    console.log(e)
}










