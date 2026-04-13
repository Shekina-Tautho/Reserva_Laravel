document.addEventListener("DOMContentLoaded", function () {

   
    const sortSelect = document.getElementById("sortHotels");
    if (sortSelect) {
        sortSelect.addEventListener("change", function () {
            const selectedSort = this.value;
            const currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set("sort", selectedSort);
            window.location.href = currentUrl.toString();
        });
    }

    
    const locationInput = document.getElementById("locationInput");
    const checkInInput = document.getElementById("checkInInput");
    const checkOutInput = document.getElementById("checkOutInput");
    const guestsInput = document.getElementById("guestsRoomsInput");

    function refreshSearch() {
        const currentUrl = new URL(window.location.href);
        
        currentUrl.searchParams.set("location", locationInput.value.trim());
        currentUrl.searchParams.set("check_in", checkInInput.value);
        currentUrl.searchParams.set("check_out", checkOutInput.value);

        const guestsVal = guestsInput.value.trim();
        let guests = null, rooms = null;

        const match = guestsVal.match(/(\d+)\s*Guests?,?\s*(\d+)?\s*Room/);
        if (match) {
            guests = match[1];
            rooms = match[2] || 1;
        }

        if (guests) currentUrl.searchParams.set("guests", guests);
        if (rooms) currentUrl.searchParams.set("rooms", rooms);

        window.location.href = currentUrl.toString();
    }

    [locationInput, checkInInput, checkOutInput, guestsInput].forEach(el => {
        el.addEventListener("blur", refreshSearch);
    });

    [locationInput, checkInInput, checkOutInput, guestsInput].forEach(el => {
        el.addEventListener("keydown", function (e) {
            if (e.key === "Enter") {
                e.preventDefault(); 
                refreshSearch();
            }
        });
    });

    guestsInput.addEventListener("keypress", function (e) {
        if (e.key === "Enter") refreshSearch();
    });

    document.querySelectorAll(".viewBtn").forEach(btn => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            window.location.href = this.getAttribute("href");
        });
    });
});
