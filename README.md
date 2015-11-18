# Destination Recommendation
Cloud project: destination recommendation based on Google Place
************process to run*************************

1.create an instance
2.ssh to this instance (copy following commands between two lines of stars)
************************************************************
sudo yum update -y
sudo yum groupinstall -y "Web Server" "PHP Support"
#If database is needed
sudo yum install -y php-mysql php-xml php-mbstring php-gd
#Start server
sudo service httpd start
sudo chkconfig httpd on
#check web: http traffic allowed, apache test page
sudo groupadd www
sudo usermod -a -G www ec2-user
********************************************************
3.exit this instance and then ssh again
4.git clone to get our source code (copy following commands between two lines of stars)
*********************************************************
sudo chown -R root:www /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} +
find /var/www -type f -exec sudo chmod 0664 {} +
sudo service httpd restart
sudo yum install -y git
git clone https://github.com/destination-recommend/project.git
# or scp from local
cp project/* /var/www/html/
cd /var/www/html/
sudo chmod -R 777 . 
***********************************************************
5.update security group: add HTTP and set IP:anyway
6.create table in database
7.edit sort.php and index.html
8.type public_IP/?keyword=coffee to get the recommended destination

