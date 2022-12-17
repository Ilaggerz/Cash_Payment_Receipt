document.addEventListener("readystatechange", (e) => {
  if (e.target.readyState === "complete") {
    console.log("readyState: complete");
  }
  initApp();
});

const initApp = () => {
  const generateRecNoBtn = document.querySelector("#generate__rec__no");
  const inputGenerateRecNo = document.querySelector("#generate__receipt__no");
  const selectHomeTypes = document.querySelector("#home__types");
  const monthlyRent = document.querySelector("#monthly__rent");
  let randomNum;

  const generateRandomNum = () => {
    randomNum = Math.floor(Math.random() * 99999) + 10000;
    return randomNum;
  };

  generateRecNoBtn.addEventListener("click", (e) => {
    e.preventDefault();

    inputGenerateRecNo.value = generateRandomNum();
  });

  selectHomeTypes.addEventListener("change", () => {
    monthlyRent.value = selectHomeTypes.value;
  });
};
