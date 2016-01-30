#!/bin/sh
# Checkt of alle bestanden die eindigen op .php correcte php syntax hebben.

function parse_file {
	if [[ $(php -l $1) != "No syntax errors detected in $file" ]]; then
		echo "syntax error"
		exit 1
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

parse_directory $1

echo "valid"
exit 0
