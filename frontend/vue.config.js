module.exports = {
    devServer: {
        port: 80,
        proxy: "http://localhost/agile_app/backend",
    },
};