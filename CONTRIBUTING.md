# WP UI Kit
![Version](https://img.shields.io/badge/version-v0.0.0-violet.svg)
![Last commit](https://img.shields.io/github/last-commit/cemderin/wp-ui-kit.svg?style=flat)
![WordPress v5.0.3](https://img.shields.io/badge/wordpress-v5.0.3-blue.svg)

**Admin UI Kit for WordPress.**

Create admin interfaces seamlessly integrated into WordPress backend. 

## Requirements
1. [VirtualBox](https://www.virtualbox.org/)
2. [Vagrant](https://www.vagrantup.com/)
3. [vagrant-hostmanager](https://github.com/devopsgroup-io/vagrant-hostmanager)

## Install dependencies with homebrew (macOS)
Run

```bash
brew install cask
brew cask install virtualbox vagrant
vagrant plugin install vagrant-hostmanager
```

## Getting started
To bring your development stack up, start the vagrant box.

```bash
vagrant up
```

Frontend: http://wp-ui-kit.local  
Backend: http://wp-ui-kit.local/wp-admin  
phpMyAdmin: http://wp-ui-kit.local/phpmyadmin

MySQL user: `hypress`   
MySQL password: `hypress`  
MySQL database: `hypress`  

WordPress user: `hypress`  
WordPress password: `hypress`

## Enable local https
To get local https, you can utilize [mkcert]. Follow the link for installation instructions.

After installing mkcert and creating a local CA create a certificate for hypress.

```bash
cd .hypress/
mkcert wp-ui-kit.local
```

If you ran `vagrant up` already, you need to provision the box again.

```bash
vagrant provision
```

## Bundle your theme or Plugin
To create a production ready release, just run

```bash
npm run bundle
```
You'll find a ready to use bundle in `./dist`.

[hypress]: https://github.com/hypress
[generator-hypress]: https://github.com/hypress/generator-hypress
[mkcert]: https://github.com/FiloSottile/mkcert
