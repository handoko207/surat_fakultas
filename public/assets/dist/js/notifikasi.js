function showNotification(title, message, type) {
  Swal.fire({
    title: title,
    text: message,
    icon: type,
  });
}

function showNotificationHtml(title, message, type) {
  Swal.fire({
    title: title,
    html: message,
    icon: type,
  });
}
