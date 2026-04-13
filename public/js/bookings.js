document.addEventListener("DOMContentLoaded", () => {

  // Edit Booking
  document.querySelectorAll(".bi-pencil-square").forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("editBookingID").value = btn.dataset.id;
      document.getElementById("editBookingName").value = btn.dataset.name;
      document.getElementById("editBookingHotel").value = btn.dataset.hotel;
      document.getElementById("editBookingCheckin").value = btn.dataset.checkin;
      document.getElementById("editBookingCheckout").value = btn.dataset.checkout;

      new bootstrap.Modal(document.getElementById("editBookingModal")).show();
    });
  });

  // Delete Booking
  document.querySelectorAll(".bi-trash").forEach(btn => {
    btn.addEventListener("click", () => {
      document.getElementById("deleteBookingID").value = btn.dataset.id;
      new bootstrap.Modal(document.getElementById("deleteBookingModal")).show();
    });
  });

  // Preview Booking
    document.querySelectorAll(".bi-eye-fill").forEach(btn => {
        btn.addEventListener("click", () => {

            document.getElementById("prev_id").textContent = btn.dataset.id;
            document.getElementById("prev_userid").textContent = btn.dataset.userid;
            document.getElementById("prev_hotelid").textContent = btn.dataset.hotelid;

            document.getElementById("prev_name").textContent = btn.dataset.name;
            document.getElementById("prev_email").textContent = btn.dataset.email;
            document.getElementById("prev_phone").textContent = btn.dataset.phone;

            document.getElementById("prev_address").textContent = btn.dataset.address;
            document.getElementById("prev_city").textContent = btn.dataset.city;
            document.getElementById("prev_zip").textContent = btn.dataset.zip;
            document.getElementById("prev_country").textContent = btn.dataset.country;

            document.getElementById("prev_checkin").textContent = btn.dataset.checkin;
            document.getElementById("prev_checkout").textContent = btn.dataset.checkout;
            document.getElementById("prev_guests").textContent = btn.dataset.guests;
            document.getElementById("prev_nights").textContent = btn.dataset.nights;

            document.getElementById("prev_taxamt").textContent = btn.dataset.taxamt;
            document.getElementById("prev_taxpercent").textContent = btn.dataset.taxpercent;
            document.getElementById("prev_netprice").textContent = btn.dataset.netprice;

            document.getElementById("prev_request").textContent = btn.dataset.request;

            document.getElementById("prev_status").textContent = btn.dataset.status;

            // Image
            const img = btn.dataset.image;
            document.getElementById("prev_image").src = img && img !== "" ? img : "../Assets/placeholder.png";

            new bootstrap.Modal(document.getElementById("previewBookingModal")).show();
        });
    });

});
