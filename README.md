# tailsUp
A framework to create listings and handle applications for the adoption of rescue dogs

## Requirements

* PHP >= 5.4
* Composer - [Install](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
* Ansible >= 1.9.2 - [Install](http://docs.ansible.com/intro_installation.html) • [Docs](http://docs.ansible.com/) • [Windows wiki](https://github.com/roots/trellis/wiki/Windows)
* Virtualbox >= 4.3.10 - [Install](https://www.virtualbox.org/wiki/Downloads)
* Vagrant >= 1.5.4 - [Install](http://www.vagrantup.com/downloads.html) • [Docs](https://docs.vagrantup.com/v2/)
* vagrant-bindfs >= 0.3.1 - [Install](https://github.com/gael-ian/vagrant-bindfs#installation) • [Docs](https://github.com/gael-ian/vagrant-bindfs) (Windows users may skip this)
* vagrant-hostsupdater - [Install](https://github.com/cogitatio/vagrant-hostsupdater#installation) • [Docs](https://github.com/cogitatio/vagrant-hostsupdater)

## Installation

1. Clone the git repo - `git clone https://github.com/stylesfirst/tailsUp.git`
2. `cd site/`
3. Get Composer `curl -sS https://getcomposer.org/installer | php`
4. Install Composer `php composer.phar install`
4. Install ansible:
  * `cd ../ansible`
  * `sudo pip install ansible`
5. Install external Ansible roles/packages. `ansible-galaxy install -r requirements.yml`
6. Install virtualbox
7. Install vagrant
8. Install vagrant-bindfs `vagrant plugin install vagrant-bindfs`
9. Install vagrant-hostsupdater `vagrant plugin install vagrant-hostsupdater`
10. Install external theme packages:
  * `cd site/web/app/themes/sage`
  * `npm install`
  * `bower install`
  * `gulp`
11. Bring up virtual dev environment and add soil plugin:
  * `vagrant up`
  * `vagrant provision`
  * `vagrant ssh`
  * `cd /srv/www/tailsup.org.au/current && composer require roots/soil`
  * `wp plugin activate soil`

## Deployment
* `cd ansible/`
* `bash -x ./deploy.sh <environment> tailsup.org.au`

## Environments
* Dev - tailsup.dev
* Production - tailsup.org.au
