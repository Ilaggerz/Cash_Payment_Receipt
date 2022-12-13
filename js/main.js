document.addEventListener("readystatechange", (e) => {
  if (e.target.readyState === "complete") {
    console.log("readyState: complete");
  }
  initApp();
});

const initApp = () => {
  const generateRecNoBtn = document.querySelector("#generate__rec__no");
  const inputGenerateRecNo = document.querySelector("#generate__receipt__no");
  let randomNum;

  const generateRandomNum = () => {
    randomNum = Math.floor(Math.random() * 99999) + 10000;
    return randomNum;
  };
  generateRecNoBtn.addEventListener("click", (e) => {
    e.preventDefault();
    e.stopPropagation();

    inputGenerateRecNo.value = generateRandomNum();
  });
};
