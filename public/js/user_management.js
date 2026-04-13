document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".icon-edit").forEach(icon => {
    icon.addEventListener("click", () => {
      const id = icon.dataset.id || icon.getAttribute('data-id');
      document.getElementById("edit_user_id").value = id || "";
      document.getElementById("edit_first_name").value = icon.dataset.firstname || "";
      document.getElementById("edit_last_name").value = icon.dataset.lastname || "";
      document.getElementById("edit_email").value = icon.dataset.email || "";
      document.getElementById("edit_role").value = icon.dataset.role || "";
      document.getElementById("edit_status").value = icon.dataset.status || "Active";

      const m = new bootstrap.Modal(document.getElementById("editUserModal"));
      m.show();
    });
  });

  document.querySelectorAll(".icon-delete").forEach(icon => {
    icon.addEventListener("click", () => {
      const id = icon.dataset.id || icon.getAttribute('data-id');
      document.getElementById("delete_user_id").value = id || "";
      const m = new bootstrap.Modal(document.getElementById("deleteUserModal"));
      m.show();
    });
  });

  document.querySelectorAll(".icon-preview").forEach(icon => {
    icon.addEventListener("click", () => {
      alert("Preview clicked — implement details page or modal.");
    });
  });
});
