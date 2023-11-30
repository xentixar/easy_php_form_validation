# Easy PHP Form Validation

This is a simple PHP library for easy form validation.

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
- [Validation Rules](#validation-rules)
- [Examples](#examples)
- [Contributing](#contributing)
- [License](#license)

## Installation

1. Clone the repository or download the ZIP file.

```bash
git clone https://github.com/xentixar/php_data_validation.git
```

2. Configure database in database.php inside config directory.

```bash
private $database_name = 'your_database_name';
```

3. Include autoload.php file in your file

```bash
require_once './autoload.php';
```

## Usage

1. Create an instance of the Validation class and pass data to it.

```bash
$data = [
    'name' => 'John',
    'email' => 'test@gmail.com',
    'password' => '12345678',
    'role' => 'user'
];
$validator = new Validation($data);
```

2. Add validation rules using the validate method.

```bash
$validated = $validator->validate([
    'name' => 'required|max:100|exists:users,id',
    'email' => 'required|email|max:100',
    'password' => 'required|min:8|max:25',
    'role' => 'required|in:admin,user'
]);
```

## Validation Rules

The library supports the following validation rules:

* 'required' => Field must be present in the form data.
* 'email' =>  Field must be a valid email address.
* 'number' =>  Field must be a number.
* 'image' =>  Field must be a valid email image.
* 'max:m' =>  Maximum length for strings or maximum value for numbers.
* 'min:n' =>  Minimum length for strings or minimum value for numbers.
* 'in:something,something_else' =>  Field must be a value present in the data.
* 'exists:table,column' => Field must be a value present in the column of the given table.


## Examples

Check the examples directory for sample usage of the form validation library.


## Contributing

* Fork the repository.
* Create a new branch: git checkout -b feature-name.
* Commit your changes: git commit -m 'Add new feature'.
* Push to the branch: git push origin feature-name.
* Submit a pull request.

## License
This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

