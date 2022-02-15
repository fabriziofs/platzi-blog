<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

# Platzi Blog

Small blog made for practice and understand the laravel framework.

## 🚀 Environment Setup

### 🐳 Needed tools

1. [Install Docker](https://www.docker.com/get-started)
2. Clone this project: `git clone https://github.com/fabriziofs/platzi-blog`
3. Move to the project folder: `cd platzi-blog`

### ⚙️️ Environment configuration

1. Check if `WWWUSER` and `WWWGROUP` variables are declared in your local environment.
    * If you dont, add this to your `.zshrc`,`.bashrc`, etc... and restart your terminal.
        - `export WWWGROUP="$(id -g)"`
        - `export WWWUSER="$(id -u)"`
2. Start the container with ` ./vendor/bin/sail up`
