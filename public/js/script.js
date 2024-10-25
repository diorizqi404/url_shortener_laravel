let isNewUser;
document.addEventListener("DOMContentLoaded", function () {
    const driver = window.driver.js.driver;
    const driverObj = driver({
        showProgress: true,
        allowClose: true,
        showButtons: ["next", "previous"],
        steps: [
            {
                element: "#analytics",
                popover: {
                    title: "Welcome to the Tour!",
                    description:
                        "Ini bagian analytics, kamu dapat melihat total url yang kamu punya dan total klik untuk seluruh url mu.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#input-long-url",
                popover: {
                    title: "Masukkan URL",
                    description:
                        "Nanti setelah tur ini selesai, kamu bisa masukin url panjanggggggg disini.",
                    side: "left",
                    align: "center",
                },
            },
            {
                element: "#custom-url-create",
                popover: {
                    title: "Apa url pendeknya?",
                    description:
                        "Kamu bisa custom url pendek yang kamu inginkan.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#btn-random-url",
                popover: {
                    title: "Bingung dengan url pendek?",
                    description:
                        "Kalau bingung mikirin url pendeknya apa, klik ini aja. Opsi ini ga wajib lho.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#btn-create-url",
                popover: {
                    title: "Selangkah lagi!",
                    description:
                        "Setelah kamu selesai mengisi semuanya, klik tombol ini untuk membuat url pendek.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#shortened_url",
                popover: {
                    title: "Voilaaaa🎉",
                    description: "Url yang kamu buat tadi udah jadiii.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#url-created-at",
                popover: {
                    title: "Sabar yahh, bentar lagi tour nya selesai.",
                    description:
                        "Sedikit info nih, ini tanggal dan waktu kapan url mu dibuat",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#url-clicks",
                popover: {
                    description:
                        "Kalo ini, untuk liat udah berapa kali url mu di-klik",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#btn-copy-url",
                popover: {
                    title: "Mudah!",
                    description:
                        "Untuk menyalin url ke papan klip, cukup klik tombol ini.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#btn-edit-url",
                popover: {
                    title: "Url kamu ada yang salah?",
                    description: "Tenang, kamu bisa mengeditnya kok.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#btn-delete-url",
                popover: {
                    title: "Url ini udah ga kepake?",
                    description: "Daripada menuh-menuhin, mending dihapus aja.",
                    side: "left",
                    align: "start",
                },
            },
            {
                element: "#start-tour",
                popover: {
                    title: "Butuh bantuan?",
                    description:
                        "Kalau nanti kamu butuh bantuan, klik ini ajaaa.",
                    side: "left",
                    align: "start",
                },
            },
        ],
    });

    document
        .getElementById("start-tour")
        .addEventListener("click", function () {
            driverObj.drive();
        });

    isNewUser = document.body.dataset.isNewUser === "1";
    if (isNewUser) {
        setTimeout(() => {
            driverObj.drive();
        }, 3000);
    }

    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
    fetch("/update-user-status", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
        },
        body: JSON.stringify({ is_new: false }),
    })
});

let generateRandomURL = () => {
    let chars =
        "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    let shortUrl = "";
    for (let x = 0; x <= 6; x++) {
        shortUrl += chars[Math.floor(Math.random() * chars.length)];
    }
    document.getElementById("custom-url-create").value = shortUrl;
    document.getElementById("custom-url-edit").value = shortUrl;
};
