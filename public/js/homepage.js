document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("searchForm");

    
    form.addEventListener("keydown", function(e) {
        if (e.key === "Enter") {
            e.preventDefault(); 
            form.submit();     
        }
    });
});
