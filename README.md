# Laravel Nova Percentage Field
A field to show percent values in Laravel Nova

# Installation
```
composer require satoved/percentage
```

# Usage
```
Percentage::make('Bonus')->precision(2)
```

# Screenshots
Form view:
![Form View](https://github.com/satoved/percentage/blob/master/images/formView.png?raw=true)

Detail view:
![Form View](https://github.com/satoved/percentage/blob/master/images/indexView.png?raw=true)

# Pros
- Percent sign on every view
- HTML5 validation on the field
- Saves empty input value as null

# Cons
- Works only with percentages stored as float in DB for now
