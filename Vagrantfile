# v 1.6.0
# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
    config.vm.box = "scotch/box"
    config.vm.synced_folder ".", "/var/www", type: "nfs"

    config.hostmanager.enabled = true
    config.hostmanager.manage_host = true
    config.hostmanager.manage_guest = true
    config.hostmanager.ignore_private_ip = false
    config.hostmanager.include_offline = true

    config.vm.define 'wcbrn.dev' do |node|
        node.vm.hostname = 'wcbrn.dev'
        node.vm.network :private_network, ip: '192.168.33.101'
    end

    config.vm.provision "shell", inline: <<-SHELL

        # apt update
        sudo add-apt-repository -y ppa:ondrej/php
        sudo apt-get update

        ### PHP 7.0 ###
        sudo apt-get install -y php7.0
        sudo apt-get install -y php7.0-mysql libapache2-mod-php7.0 php7.0-gd php7.0-mysqli php7.0-soap php7.0-xml php7.0-zip
        sudo a2dismod php5
        sudo a2enmod php7.0
        sudo apachectl restart

        ### PHP 7.1 ###
        # sudo apt-get install -y php7.1
        # sudo apt-get install -y php7.1-mysql libapache2-mod-php7.1 php7.1-gd php7.1-mysqli php7.1-soap php7.1-xml php7.1-zip php7.1-mbstring php7.1-curl
        # sudo a2dismod php5
        # sudo a2enmod php7.1
        # sudo apachectl restart

        # MySQL 5.6
        sudo apt-get install -y mysql-server-5.6 mysql-server-core-5.6
        sudo /etc/init.d/mysql start

        # SSL
        sudo a2enmod ssl
        sudo sed -i -e '\$a<VirtualHost *:443>' /etc/apache2/sites-available/000-default.conf
        sudo sed -i -e '\$aSSLEngine on' /etc/apache2/sites-available/000-default.conf
        sudo sed -i -e '\$aSSLCertificateFile /etc/ssl/certs/mhm.crt' /etc/apache2/sites-available/000-default.conf
        sudo sed -i -e '\$aSSLCertificateKeyFile /etc/ssl/private/mhm.key' /etc/apache2/sites-available/000-default.conf
        sudo sed -i -e '\$aDocumentRoot /var/www/web' /etc/apache2/sites-available/000-default.conf
        sudo sed -i -e '\$a</VirtualHost>' /etc/apache2/sites-available/000-default.conf
        sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/mhm.key -out /etc/ssl/certs/mhm.crt -subj "/C=CH/ST=Schweiz/L=Bern/O=mhm/OU=IT Department/CN=webfactory"

        # Change web root + add context
        sudo sed -i s,/var/www/public,/var/www/web,g /etc/apache2/sites-available/000-default.conf
        sudo sed -i s,/var/www/public,/var/www/web,g /etc/apache2/sites-available/scotchbox.local.conf

        # Restart Apache
        sudo service apache2 restart

    SHELL

    config.vm.provision "shell", inline: "/home/vagrant/.rbenv/shims/mailcatcher --http-ip=0.0.0.0", run: "always"
end
