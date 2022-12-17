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
  const getCurrentYear = document.getElementById("getCurrentYear");
  const overlay = document.querySelector(".overlay");
  const submitBtn = document.querySelector("#submit");
  const backBtn = document.querySelector("#back_btn");
  const printBtn = document.querySelector("#print__btn");
  let randomNum;

  const d = new Date();
  getCurrentYear.innerHTML = d.getFullYear();
  const generateRandomNum = () => {
    randomNum = Math.floor(Math.random() * 99999) + 10000;
    return randomNum;
  };

  submitBtn.addEventListener("click", (e) => {
    e.preventDefault();

    if (overlay.classList.contains("isActive")) {
      overlay.classList.remove("isActive");
    } else {
      overlay.classList.add("isActive");
    }
  });

  backBtn.addEventListener("click", (e) => {
    e.preventDefault();

    if (overlay.classList.contains("isActive")) {
      overlay.classList.remove("isActive");
    } else {
      overlay.classList.add("isActive");
    }
  });

  generateRecNoBtn.addEventListener("click", (e) => {
    e.preventDefault();

    inputGenerateRecNo.value = generateRandomNum();
  });

  selectHomeTypes.addEventListener("change", () => {
    monthlyRent.value = selectHomeTypes.value;
  });

  printBtn.addEventListener("click", (e) => {
    window.print();
  });
};
