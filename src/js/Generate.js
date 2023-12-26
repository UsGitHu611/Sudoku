import {runComplexity,saveData,loadData} from "./helperJS/handlers.js";
export default class GenerateField{

    #N = 0;
    constructor(N) {
        this.#N = parseInt(N);
    }

    matrix(){

        return Array(this.#N).fill(

            Array(this.#N).fill(0)
        )
    }

    appendContent(){
        
        try {
            const container = document.querySelector('.container-sudoku');

            let sudoku = this.matrix();

            for (let i = 0; i < sudoku.length; i++) {

                for (let j = 0; j < sudoku[i].length; j++) {

                    container.style.gridTemplateColumns = `repeat(${sudoku.length}, 1fr)`;

                    container.innerHTML += `<input min="1" max="${this.#N}" type="number">`;
                }
            }

        }catch (e) {

            console.log(e, "this element is not on the page")
        }
    }


}


runComplexity(sessionStorage);
saveData()
window.onload = () => loadData();














