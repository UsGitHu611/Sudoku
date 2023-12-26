const textInput = document.querySelector('#nick');
const passInput = document.querySelector('#pass');
const rePassInput = document.querySelector('#repPass');

let placeholder1 = "@ЛордТьмы1998@";
let placeholder2 = "(КличкаКота)";
let placeholder3 = "(КличкаКота)";

const delay = async (ms) => await new Promise(resolve => setTimeout(resolve, ms));
const getRandom = (max) => Math.floor(Math.random() * max);
const encode = (substr) => {
    const chars = "$%&'*+,-.{~/|:#;<=>?@№}";

    for (let i = 0; i < substr.length; i++) {
         substr = substr.replace(substr[i],chars[getRandom(substr.length)]);
    }
    return substr;
}

const animationPlaceHolder = async (placeHolder,input) => {

    try{
        for (let i = 0; i <= placeHolder.length; i++) {
            await delay(50);
            let substr = encode(placeHolder.slice(placeHolder.length-i));
            input.setAttribute('placeholder',substr);

        }
        let replaceHolder = input.getAttribute('placeholder');

        for (let i = 0; i <= replaceHolder.length ; i++) {
            await delay(80);
            input.setAttribute('placeholder', replaceHolder = replaceHolder.replace(replaceHolder[i],placeHolder.charAt(i)));
        }
    }catch (e) {
        console.log("\"inputs is not defined, maybe target equals to null or not assigned?\"\n",e.message)
    }

}

animationPlaceHolder(placeholder1,textInput)
    .then(() => {
        animationPlaceHolder(placeholder2,passInput)
        animationPlaceHolder(placeholder3,rePassInput)
    });









