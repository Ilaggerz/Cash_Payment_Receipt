document.addEventListener("readystatechange", (e) => {
    if (e.target.readyState === "complete") {
      console.log("readyState: complete");
    }
    initApp();
  });
  
  const initApp = () => {
    const printBtn = document.querySelector("#print__btn");

    printBtn.addEventListener("click", () => {
        window.print();
    })
  };
  