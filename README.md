# Infinia Home

*The backbone of the InfiniaPress suite*


## What is InfiniaHome?

InfiniaHome is the component in the InfiniaPress suite, you **MUST** install this
for any Infinia apps to be able to function at all.

InfiniaHome provides 

- User management system
- Homepage for advertising  your installation
- InfiniaApp(TM) hooks


### How to install

*Requirements*

- PHP 7+ (<PHP7 has yet to be tested in this)
- Either a MySQL or PHP database. **NOTE:** InfiniaHome can install itself on many
different hosts, however shared hosting users must have already setup and configured their database
according to [these instructions](https://this.doesnt.exist.yet). 
- Composer (for using the automated installer). If you're web host does not have/
allow you to install composer, please preconfigure InfiniaHome and the database 
on your system before uploading it to the host.
[This guide](https://this.doesnt.exist.yet) should help you out quite well.
 
If your hosting provider does not support external MySQL connections, follow
[these instructions](https://this.doesnt.exist.yet)



*Instructions are for the automated installer only*

1. Download the [latest release](https://github.com/InfiniaPress/InfiniaHome/releases), unzip it
and upload it to your web hosting services' web root, or any folder you choose.
2. Generate a database configuration using [this useful tool](https://infiniacfg.derpz.ga), and 
replace the config.yml file inside the conf folder on the
3. Open up your web browser, navigate to your Infinia Location. For example, if you unzipped it
into your web root, go to yourcompany.com/index.php?/setup/. If you unzipped it into infiniapress, go to
yourcompany.com/infiniapress/index.php?/setup/. **YOU MUST APPEND index.php?/setup/. Failure to do
so may cause issues with your installation.**
4. Follow the instructions on the page


#### Donations
BTC/BCH: 1NMizYMuEZKYu9XJXqQdMcM8YTdtfhfubW

ETH: 0x5F90b2387767382b9C43135d914db6595A259E5d