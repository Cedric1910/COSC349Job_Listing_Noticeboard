# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://vagrantcloud.com/search.
  config.vm.box = "ubuntu/xenial64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.
  # config.vm.box_check_update = false

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.
  # NOTE: This will enable public access to the opened port
  #config.vm.network "forwarded_port", guest: 80, host: 8080

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine and only allow access
  # via 127.0.0.1 to disable public access
  #config.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1" //OLD LINES
  #config.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"] //OLD LINES

  #Creates a web server on startup which is a particular type of VM that will be used to interconnect between our different VM's. 
  config.vm.define "webserver" do |webserver|
    #The following options are about the current webserver VM.
    webserver.vm.hostname = "webserver" #specifies the current webservers hostname.
    webserver.vm.network "forwarded_port",guest: 80,host: 8080,host_ip: "127.0.0.1"
    webserver.vm.network "private_network", ip: "192.168.2.1"
    webserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]

    webserver.vm.provision "shell", inline: <<-SHELL
     apt-get update
     apt-get-install -y apache2 php libapache2-mod-php php-mysql
     cp /vagrant/test-website.conf /etc/apache2/sites-available/
     a2ensite test-website
     a2dissite 000-default
     service apache2 reload


    SHELL
  end

  # Section for the database VM
  config.vm.define "dbserver" do |dbserver|
    #next is exclusive to the dbserver settings
    dbserver.vm.hostname = "dbserver"
    dbserver.vm.network "private_network", ip:"192.168.2.2"
    dbserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
    dbserver.vm.provision "shell", inline: <<-SHELL
     apt-get update
     export MYSQL_PWD='insecure_mysqlroot_pw'
     echo "mysql-server mysql-server/root_password password $MYSQL_PWD" | debconf-set-selections
     echo "mysql-server mysql-server/root_password_again password $MYSQL_PWD" | debconf-set-selections
     apt-get -y install mysql-server
     echo "CREATE DATABASE assignment1;" | mysql
     echo "CREATE USER 'webuser'@'%' IDENTIFIED BY 'insecure_db_pw';" |mysql
     echo "GRANT ALL PRIVILEGES ON fvision.* TO 'webuser'@'%'" | mysql
     export MYSQL_PWD='insecure_db_pw'
     cat /vagrant/setup-database.sql | mysql -u webuser assignment1
     sed -i'' -e '/bind-address/s/127.0.0.1/0.0.0.0/' /etc/mysql/mysql.conf.d/mysqld.cnf
     service mysql restart
   SHELL
  end
    

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.
  # config.vm.network "private_network", ip: "192.168.33.10"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  # config.vm.network "public_network"

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:
  #
  # config.vm.provider "virtualbox" do |vb|
  #   # Display the VirtualBox GUI when booting the machine
  #   vb.gui = true
  #
  #   # Customize the amount of memory on the VM:
  #   vb.memory = "1024"
  # end
  #
  # View the documentation for the provider you are using for more
  # information on available options.

  config.vm.provision "shell", inline: <<-SHELL
    apt-get update
    apt-get install -y apache2

    # Change VM's webserver's configuration to use shared folder.
    # (Look inside test-website.conf for specifics.)
    cp /vagrant/test-website.conf /etc/apache2/sites-available/
    # install our website configuration and disable the default
    a2ensite test-website
    a2dissite 000-default
    service apache2 reload
  SHELL
end
