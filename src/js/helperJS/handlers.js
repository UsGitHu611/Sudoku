import GenerateField from "../Generate.js";

const container = document.querySelector('.container-sudoku');

export function listenerComplexity(evt){

    const {currentTarget} = evt;

    switch (currentTarget.innerText) {

        case "easy" :
            sessionStorage.setItem("easy",4);
            location.replace("sudoku.html");
            break;

        case "middle":
            sessionStorage.setItem("middle",5)
            location.replace("sudoku.html");
            break;

        case "hard":
            sessionStorage.setItem("hard",6)
            location.replace("sudoku.html");
            break;
    }
}
export function runComplexity(session) {

    for (let key in session) {

        switch (key) {
            case "easy":
                return  new GenerateField(session.getItem(key)).appendContent();

            case "middle":
                return  new GenerateField(session.getItem(key)).appendContent();

            case "hard":
                return  new GenerateField(session.getItem(key)).appendContent();
        }
    }

}

export function check(sessionValue){

    const MATRIX_N = sessionValue;

    const matrix = [...container.children];

    for (let i = 0; i < MATRIX_N; i++) {

        let rowSet = new Set();
        let colSet = new Set();

        for (let j = 0; j < MATRIX_N; j++) {

            let row = matrix[i*MATRIX_N+j];
            let col = matrix[j*MATRIX_N+i];

            if (row.value === '' || col.value === ''){
                return false;
            }

            if (row.value !== ''){
                if (rowSet.has(row.value)) return false;
                rowSet.add(row.value);
            }

            if (col.value !== ''){
                if (colSet.has(col.value)) return false;
                colSet.add(col.value);
            }

        }
    }
    return true;
}

export function exitToMain(){
    sessionStorage.clear();
    localStorage.clear();
    location.replace("complexity.html");
}


export function saveData(){

    try {

        [...container.children].forEach((value,index) => {

            value.addEventListener('input', (e) => {

                localStorage.setItem(index, e.currentTarget.value[0]);
            })
        })

    }catch (e) {

        console.log(e);
    }
}

export function loadData(){

    try {

        [...container.children].forEach((value, index) => {

            value.value = localStorage.getItem(index)
        })

    }catch (e) {

        console.log(e)
    }
}

