document.addEventListener("DOMContentLoaded", function () {
    // Select all the sidebar items
    const sidebarItems = document.querySelectorAll(".siedeber_item");

    sidebarItems.forEach((item) => {
        // Select the header and body within each item
        const header = item.querySelector(".side_ber_item_header");
        const body = item.querySelector(".sideber_item_body");

        // Initially hide the body
        body.style.display = "none";

        // Add click event listener to the header
        header.addEventListener("click", function () {
            // Close all other items
            sidebarItems.forEach((otherItem) => {
                const otherBody = otherItem.querySelector(".sideber_item_body");
                const otherHeader = otherItem.querySelector(".side_ber_item_header");
                if (otherBody !== body) {
                    otherBody.style.display = "none"; // Hide other bodies
                    otherHeader.classList.remove("active"); // Remove active class
                }
            });

            // Toggle the display of the current item's body
            if (body.style.display === "none") {
                body.style.display = "block";
                header.classList.add("active"); // Add active class
            } else {
                body.style.display = "none";
                header.classList.remove("active"); // Remove active class
            }
        });
    });
});
//tab sections
document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll(".tab");
    const contents = document.querySelectorAll(".tab-content");

    tabs.forEach(tab => {
        tab.addEventListener("click", function () {
            // Remove 'active' class from all tabs
            tabs.forEach(t => t.classList.remove("active"));
            // Add 'active' class to clicked tab
            this.classList.add("active");

            // Hide all tab contents
            contents.forEach(content => content.classList.remove("active"));
            // Show the corresponding content
            const tabId = this.getAttribute("data-tab");
            document.getElementById(tabId).classList.add("active");
        });
    });
});
