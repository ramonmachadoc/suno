function getToday() {
    var today = new Date()

    document.getElementById("todayFrom").value = today
                .getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2)
    document.getElementById("todayTo").value = today
                .getFullYear() + '-' + ('0' + (today.getMonth() + 1)).slice(-2) + '-' + ('0' + today.getDate()).slice(-2)


}