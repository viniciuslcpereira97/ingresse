resource "aws_default_vpc" "main" {
    tags = {
        Description = "Default VPC"
        Name        = "main"
        Type        = "vpc"    
    }
}

resource "aws_subnet" "subnet_A" {
    vpc_id            = "${aws_default_vpc.main.id}"
    availability_zone = "${var.availability_zone["primary"]}"
    cidr_block        = "${cidrsubnet("${aws_default_vpc.main.cidr_block}", 1, 1)}"

    tags = {
        Name        = "subnet_A",
        Description = "primary subnet",
        Type        = "subnet"
    }
}

resource "aws_subnet" "subnet_B" {
    vpc_id            = "${aws_default_vpc.main.id}"
    availability_zone = "${var.availability_zone["secundary"]}"
    cidr_block        = "${cidrsubnet("${aws_default_vpc.main.cidr_block}", 2, 1)}"

    tags = {
        Name        = "subnet_B",
        Description = "secundary subnet",
        Type        = "subnet"
    }
}
