# Materialize Free Material Design Admin Template

Materialize - **[Free Material Design Admin Template](https://pixinvent.com/free-materialize-material-design-admin-template/)** is the excellent responsive google material design inspired admin template.

Materialize can be used for any type of web applications dashboard: custom admin panels, admin dashboards, CMS, CRM, SAAS and websites: CMSs, SAAS, CRM, HRMS, Support & Social portal, e-commerce, personal business, corporate.

We’ve written the CSS in SASS which is a great way of organizing your CSS code in a structured manner.

Materialize has a minimal, sleek, clean and intuitive design which makes your next project look awesome and yet user friendly, Have look Materialize today!



## Demo

https://pixinvent.com/free-materialize-material-design-admin-template/

[![Materialize Free Material Design Admin Template Presentation](https://pixinvent.com/free-materialize-material-design-admin-template/free-materialize-material-design-admin-template.png "Materialize Free Material Design Admin Template Presentation")](https://pixinvent.com/free-materialize-material-design-admin-template/)
## Table of contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [What's included](#whats-included)
- [Documentation](#documentation)
- [Contributing](#contributing)
- [Creators](#creators)
- [Change log](#change-log)
- [Credits](#credits)
- [Copyright and license](#copyright-and-license)

## Looking for more features ? Upgrade To Premium

[![Materialize Material Design Admin Template Presentation](https://pixinvent.com/free-materialize-material-design-admin-template/premium-materialize-material-design-admin-template.png "Materialize Premium Presentation")](https://pixinvent.com/materialize-material-design-admin-template/landing/)

|Materialize Lite Features|Materialize Pro Features|
|--- | --- |
|[DEMO](https://pixinvent.com/free-materialize-material-design-admin-template/) | [DEMO](https://pixinvent.com/materialize-material-design-admin-template/landing/) |
|[Download](https://github.com/pixinvent/free-materialize-material-design-admin-template) | [Purchase](https://themeforest.net/item/materialize-material-design-admin-template/11446068?ref=pixinvent&license=regular&open_purchase_for_item_id=19297560&purchasable=source) |
|1 Theme with simple fixed menu|5 Themes with fixed, collapseble, overlay & horizontal menu |
||Built in starter-kits for all layouts|
|1 Simple Dashboards| 2 Niche Dashboards|
|-|Multiple Navbar & Menu Options|
|-| Header & Footer Customizations|
|Materialize tables| Materialize, DataTables & JSGrid|
|-| Date & Time Pickers|
|Materialize Card| Materialize, Advance & Extended Cards|
|-| File Uploaders|
|-| Event Calendars|
|-| 5+ Chart Libraries|
|-| eCommerce, Blog, User & Error Pages |
|Regular Support| **Incredible Support**|
|-| **Delightful Documentation**|

## Prerequisites

Node JS must be installed on your system to run grunt css generation and dist commands.
You can download and install nodejs from this URL: https://nodejs.org/en/

## Installation

**1. Download:**
Download Materialize - Free **[Material Design Admin Template](https://pixinvent.com/materialize-material-design-admin-template/landing/)** from Github or visit **[Pixinvent Creative Studio](https://pixivnent.com/)** and download the latest release.

**2. Github**
- Fork the repository ([here is the guide](https://help.github.com/articles/fork-a-repo/)).
- Clone to your machine
```
git clone https://github.com/YOUR_USERNAME/free-materialize-material-design-admin-template.git
```

### Grunt

- Run npm install command to install required node modules

```
npm install
```

**Running Grunt Dist Commands**

Except Grunt dist-js command you must have to pass Layout = "{{theme-name}}" parameter to let grunt know compile theme specific scss files.
Generic syntax for grunt command is
`grunt {{task}} --Layout="{{theme-name}}"`
Where task will be name of grunt task and theme-name will the theme you wish to compile scss for it.

Task | Command | Description
--- | --- | ---
Dist|`grunt dist --Layout="fixed-menu`|To clean css, js and build distributable css and js files
Monitor|`grunt monitor --Layout="fixed-menu`|   Watch all scss files change and compile it accordingly. In this command you need to pass the Layout parameater in grunt commands
Build JS | `grunt dist-js` |To clean js files and build distributable js files
Compile SCSS|`grunt sass-compile --Layout="fixed-menu"`|Compile scss files
Build CSS|`grunt dist-compile --Layout="fixed-menu"`|To clean css files and build distributable css files

## What's included

Below is the Materialize - Free **[Material Design Admin Template](https://pixinvent.com/materialize-material-design-admin-template/landing/)** folder structure. Within the download you'll find the following directories and files, logically grouping common assets and providing both compiled and minified variations. You'll see something like this:
```
  materialize-admin/        <-- Template root folder
  |--css/
  |  |--custom/custom.css   <-- Write your custom css or generate custom.css using custom.scss
  |  |--materialize.css     <-- compiled from scss/materialize.scss
  |  |--style.css           <-- compiled from scss/style.scss
  |
  |--fonts/                 <-- Template fonts & icon-fonts
  |  |--roboto/
  |  |--material-design-icons/
  |
  |--images/                <-- All the images of the template
  |
  |--js/
  |  |--materialize-plugins/ <-- Materialize framework core JS files
  |  |--scripts/             <-- Template html page wise js scripts
  |  |--custom-script.js     <-- Use this JS file to write your own custom JS
  |  |--materialize.js       <-- Materialize framework JS file generated from materialize-plugins/
  |  |--plugins.js           <-- Template main JS file
  |
  |--scss/
  |  |--components/          <-- Materialize framework core SCSS files
  |  |--custom/              <-- Use this SCSS file to write your own custom SCSS, It will generate css/custom/custom.css file.
  |  |--theme-components/    <-- Template components SCSS file
  |  |--themes/              <-- Template different themes SCSS file, you can create your own theme folder here !
  |  |--materialize.scss     <-- Materialize framework main SCSS files
  |  |--style.scss           <-- Template main SCSS files
  |  |--theme.scss           <-- Auto generated theme.scss file from Grunt, Generate for specific theme(i.e collapsible-menu) based on grunt commend  grunt watch --Layout="collapsible-menu"
  |
  |--vendors/                <-- All Venders JS & SCSS
  |
  *.html                     <-- Template all html file here 
  |
  Gruntfile.js               <-- Grunt JS files
  |
  package.json               <-- Node package JSON file.
  |
  README.md                  <-- Readme file
        
```

## Documentation

Visit the online [documentation](https://pixinvent.com/materialize-material-design-admin-template/html/documentation/)  for the most updated guide.

## Browser Support

Materialize - Free **[Material Design Admin Template](https://pixinvent.com/materialize-material-design-admin-template/landing/)** is built to work best in the latest desktop and mobile and tablet browsers,

- Chrome (latest)
- FireFox (latest)
- Safari (latest)
- Opera (latest)
- IE10+


## Contributing

Contribution are always welcome and recommended! Here is how:


- Fork the repository ([here is the guide](https://help.github.com/articles/fork-a-repo/)).
- Clone to your machine ```git clone https://github.com/YOUR_USERNAME/robust-free-bootstrap-admin-template.git```
- Make your changes
- Create a pull request

#### Contribution Requirements:

- When you contribute, you agree to give a non-exclusive license to Pixinvent Creative Studio to use that contribution in any context as we (Pixinvent Creative Studio) see appropriate.
- If you use content provided by another party, it must be appropriately licensed using an [open source](http://opensource.org/licenses) license.
- Contributions are only accepted through Github pull requests.
- Finally, contributed code must work in all supported browsers (see above for browser support).

## Creators

* **Pixinvent Creative Studio** - *Initial work* - [Pixinvent Creative Studio](https://pixinvent.com)

## Change log

**For the most recent change log, visit the [releases page](https://github.com/pixinvent/robust-free-bootstrap-admin-template/releases) or the [changelog file](https://github.com/pixinvent/robust-free-bootstrap-admin-template/blob/master/changelog.md).** 
We will add a detailed release notes to each new release.

## Credits

* [Stocksnap](https://stocksnap.io/)

* [Pixabay](https://pixabay.com/)

* [Unsplash](https://unsplash.com/)

* [Picjumbo](https://picjumbo.com/)

## Copyright and license

Materialize - Free **[Material Design Admin Template](https://pixinvent.com/materialize-material-design-admin-template/landing/)** is an open source project by [Pixinvent Creative Studio](https://pixinvent.com) that is licensed under [MIT](http://opensource.org/licenses/MIT). Pixinvent Creative Studio reserves the right to change the license of future releases.
