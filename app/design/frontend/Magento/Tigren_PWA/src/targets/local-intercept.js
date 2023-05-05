const MyApp = require("../components/Tigren/demoPage");
module.exports = targets => {
    targets.of("@magento/venia-ui").routes.tap(routes => {
        routes.push({
            name: "MyDemoPage",
            pattern: "/Tigren",
            path: require.resolve("../components/Tigren/demoPage.js")
        });


    });
};
