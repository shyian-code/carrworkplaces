const urlapi = require('url');
const siteUrl = 'https://carrworkplastg.wpengine.com/', // example `http://site-url.com/`
	themeName = 'carrworkplaces'; // example `project-name`
const URL = urlapi.parse(siteUrl);

module.exports = {
	"files": ["css/*.css","*.php", "parts/**/*.php", "templates/*.php", "js/global.js"],
	"proxy": siteUrl,
	"serveStatic": ["./"],

	rewriteRules: [
		{
			match: new RegExp( URL.path.substr(1) + "wp-content/themes/" + themeName + "/css" ),
			fn: function () {
				return "css"
			}
		},
		{
			match: new RegExp( URL.path.substr(1) + "wp-content/themes/" + themeName + "/css/theme.css" ),
			fn: function () {
				return "css/theme.css"
			}
		},
		{
			match: /AIzaSyBgg23TIs_tBSpNQa8RC0b7fuV4SOVN840/g,
			replace: "AIzaSyAZteVk16ICKxgLgH87g1D0nnG5_bC2xPI"
		}
	],
};
