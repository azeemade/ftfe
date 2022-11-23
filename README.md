# Setup process

## Tasks

### Create a laravel application
A simple laravel application is created with the following command

    composer create-project laravel/laravel ftfe

### Create 3 model with migrations called, User, Address, Profile
Since the User model already exist with the laravel app, only the address and Profile models are generated with the following command.

    php artisan make:model Address -mcf
    php artisan make:model Profile -mcf
Along with the models, migrations, controllers and factory files are generated because of the use of the **-mcf** tag. The models are populated with the mass assignment attriutes **$fillable**. 

Address: 

    protected  $fillable = [ 'user_id','address','street','city','state','zip',];

Profile:

    protected  $fillable = ['user_id','username','avatar','birthdate','bio','last_online'];

User:

    protected  $fillable = ['firstname','lastname','phonenumber','email','password',];

### Define the relation between User and Address, then User and Profile.
 **User and Address**
A user can have only one Address and an address can belong to one user. Considering this statement, the relationship between User and Address is a One-to-one relationship. This means the Address table will consist of a foreign key which belongs to a column in the User table. 

 User **hasOne** 
 

    User.php
    
    public  function  address()
    {
	    return  $this->hasOne(Address::class);
	}

 Address **BelongsTo**
 

    Address.php
    
    public  function  user()
    {
	    return  $this->belongsTo(User::class);
	}
**User and Profile**
The same as the explanation for Adress model.
User **hasOne** 
 

    User.php
    
    public  function  profile()
    {
	    return  $this->hasOne(Profile::class);
	}

 Profile **BelongsTo**
 

    Profile.php
    
    public  function  user()
    {
	    return  $this->belongsTo(User::class);
	}


### Make sure Redis is installed and configure then install this Laravel package https://github.com/spiritix/lada-cache and implement.
After configuring redis in this laravel project using **predis**, we install the lada-cache package using the follwoing composer command.

    composer require spiritix/lada-cache
Finally the lada-cache trait is included in all our 3 models by calling

    use Spiritix\LadaCache\Database\LadaCacheTrait;

### Write basic tests to test that the model works. (Optional, Recommended)
Here, PHPUnit tests are written for each model. First to check if the required columns are present in our model tables. Then we check the relationship between the models. A list of tests which were all OK are:

 - test_addresses_table_has_expected_columns
 - test_an_address_belongs_to_a_user
 - test_profiles_tables_has_expected_columns
 - test_a_profile_belongs_to_a_user
 - test_user_tables_has_expected_columns
 - test_a_user_has_a_profile
 - test_a_user_has_an_address

### Ensure https is turned on at all time and works even in the local environment.
To turn HTTPS, **FORCE_HTTPS** is set to true in the .env file and also in the AppServiceProvider file, the following is added to the boot function.

    if (App::environment('local') || App::environment('staging') || App::environment('production')) 
    {
	    URL::forceScheme('https');
    }

 
