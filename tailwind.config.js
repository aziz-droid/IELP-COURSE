module.exports = {
    content: [
        "./resources/views/client/*.blade.php",
        "./resources/views/layouts/client/*.blade.php",
        "./resources/js/app.js",
    ],
    theme: {
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            screens: {
                "2xl": "1320px",
            },
        },
    },
    plugins: [],
};
