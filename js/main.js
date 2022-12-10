document.addEventListener("readystatechange", (e) => {
  if (e.target.readyState === "complete") {
    initApp();
  }
});

const initApp = () => {
  const createBtn = document.getElementById("create__btn");
  const createReceipt = document.querySelector(".create__Receipt");
  const receiptContainer = document.querySelector(".receipt__container");
  const gobackBtn = document.querySelector("#goback__btn");
  const printBtn = document.getElementById("printBtn");
  const inputtenantName = document.getElementById("tenantName");
  const texttenantName = document.getElementById("receipt__tenantname");
  const inputhouseNumber = document.getElementById("houseNumber");
  const texthouseNumber = document.getElementById("receipt__housenumber");
  const inputpaymentDate = document.getElementById("paymentDate");
  const textpaymentDate = document.getElementById("receipt__date");
  const inputmonthlyRent = document.getElementById("monthlyRent");
  const textmonthlyRent = document.getElementById("receipt__monthlyrent");
  const textpreviousBalance = document.getElementById(
    "receipt__previousbalance"
  );
  const inputamountPaid = document.getElementById("amountPaid");
  const textamountPaid = document.getElementById("receipt__amountpaid");
  const textpresentBalance = document.getElementById("receipt__presentbalance");
  const textreceiptNo = document.getElementById("receipt__no");
  let temphouseNumber;
  const randomreceiptNumber = () => {
    return (receiptNumber = Math.floor(Math.random() * 99999) + 10000);
  };

  const calcpresentBalance = () => {
    if (Number(inputmonthlyRent.value) > Number(inputamountPaid.value)) {
      result = Number(inputmonthlyRent.value) - Number(inputamountPaid.value);
    } else {
      result = 0;
    }

    return result.toFixed(2);
  };

  createBtn.addEventListener("click", (e) => {
    e.preventDefault();
    if (
      inputtenantName.value &&
      inputhouseNumber.value &&
      inputpaymentDate.value &&
      inputamountPaid.value
    ) {
      texttenantName.innerHTML = `TENANT NAME: ${inputtenantName.value}`;
      texthouseNumber.innerHTML = `HOUSE NUMBER: ${inputhouseNumber.value}`;
      textpaymentDate.innerHTML = `Date: ${inputpaymentDate.value}`;
      textmonthlyRent.innerHTML = `MONTHLY RENT: ${inputmonthlyRent.value}`;
      textpreviousBalance.innerHTML = `PREVIOUS BALANCE: 0`;
      textamountPaid.innerHTML = `AMOUNT PAID: ${inputamountPaid.value}`;
      textpresentBalance.innerHTML = `PRESENT BALANCE: ${calcpresentBalance()}`;
      textreceiptNo.innerHTML = `Receipt No: ${randomreceiptNumber()}`;
    } else {
      alert("Please dont leave it blank!");
      return;
    }

    createReceipt.classList.add("receipt__create");

    if (receiptContainer.classList.contains("overlay")) {
      receiptContainer.classList.remove("overlay");
    } else {
      receiptContainer.classList.add("overlay");
    }
  });

  gobackBtn.addEventListener("click", () => {
    createReceipt.classList.remove("receipt__create");

    if (receiptContainer.classList.contains("overlay")) {
      receiptContainer.classList.remove("overlay");
    } else {
      receiptContainer.classList.add("overlay");
    }
  });

  printBtn.addEventListener("click", () => {
    window.print();
  });
};
