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
  const backBtn = document.querySelector("#back_btn");
  const printBtn = document.querySelector("#print__btn");
  const submitBtn = document.querySelector("#submit");
  const tenantName = document.querySelector("#tenant__name");
  const contactNumber = document.querySelector("#contact__number");
  const MTS = document.querySelector("#months__to__stay");
  const address = document.querySelector("#address");
  const street = document.querySelector("#street");

  let randomNum;

  const d = new Date();
  getCurrentYear.innerHTML = d.getFullYear();
  const generateRandomNum = () => {
    randomNum = Math.floor(Math.random() * 99999) + 10000;
    return randomNum;
  };

  // submitBtn.addEventListener("click", (e) => {
  //   if (
  //     tenantName.value === "" ||
  //     contactNumber.value === "" ||
  //     MTS.value === "" ||
  //     monthlyRent.value === "" ||
  //     inputGenerateRecNo.value === "" ||
  //     address.value === "" ||
  //     street.value === ""
  //   ) {
  //     alert("Please dont leave any blank inputs");
  //     e.preventDefault();
  //     return;
  //   } else {
  //     e.preventDefault();
  //     overlay.classList.add("isActive");
  //   }
  // });

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
    if (selectHomeTypes.value.toLowerCase() === "bungalow") {
      monthlyRent.value = 30000;
    } else if (selectHomeTypes.value.toLowerCase() === "single-detached") {
      monthlyRent.value = 15000;
    } else if (selectHomeTypes.value.toLowerCase() === "single-attached") {
      monthlyRent.value = 20000;
    } else if (selectHomeTypes.value.toLowerCase() === "duplex") {
      monthlyRent.value = 50000;
    } else if (selectHomeTypes.value.toLowerCase() === "townhouse") {
      monthlyRent.value = 80000;
    } else if (selectHomeTypes.value.toLowerCase() === "quadroplex") {
      monthlyRent.value = 60000;
    } else if (selectHomeTypes.value.toLowerCase() === "rowhouse") {
      monthlyRent.value = 90000;
    }
  });

  printBtn.addEventListener("click", (e) => {
    window.print();
  });
};
