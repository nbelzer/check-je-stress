#!/bin/bash
# Checkt of alle bestanden die eindigen op .php correcte php syntax hebben.

error_count=0

function parse_file {
	parse_output=$(php -l $1)
	if [[ $parse_output != "No syntax errors detected in $1" ]]; then
		echo
		echo "Found a syntax error in $1:"
		while read -r line
		do
			echo "> $line"
		done <<< "$parse_output"
		echo
		error_count=$(($error_count+1))
	else
		echo "Valid: $1"
	fi
}

function parse_directory {
	if [[ -f $1 ]]; then
		echo $1 | grep -q .php$
		if [[ $? -eq 0 ]]; then
			parse_file $1
		fi
	else
		for thing in $(find $1 -maxdepth 1); do
			if [[ $thing != $1 ]]; then
				parse_directory $thing
			fi
		done
	fi
}

echo "Checking all .php files for syntax errors..."
echo
parse_directory $1
echo
echo "Found $error_count file(s) with syntax errors."
if [[ $error_count > 255 ]]; then
	exit 255
else
	exit $error_count
fi
