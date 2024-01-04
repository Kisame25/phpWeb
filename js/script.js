document.getElementById("quantity").addEventListener("input", function() {
    if (this.value === "0") {
    this.setCustomValidity("Value cannot be 0");
    } else {
    this.setCustomValidity("");
    }
});


