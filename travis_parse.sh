#!/bin/bash
# Checkt of alle bestanden die eindigen op .php correcte php syntax hebben.

error_count=0

function parse_file {
	parse_output=$(php -l $1)
	if [[ $parse_output != "No syntax errors detected in $file" ]]; then
		echo
		echo "Found a syntax error in $1:"
		while read -r line
		do
			echo "> $line"
		done <<< "$parse_output"
		#echo "$parse_output"
		echo
		error_count=$(($error_count+1))
	else
		echo "Valid: $file"
	fi
}

function parse_directory {
	for file in $1/*
	do
		if [[ -f $file ]]; then
			echo $file | grep -q .php$
			if [[ $? -eq 0 ]]; then
				parse_file $file
			fi
		else
			parse_directory $file
		fi
	done
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
