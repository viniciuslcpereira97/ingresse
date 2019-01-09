resource "aws_security_group" "allow_http" {
    name   = "allow_http"
    vpc_id = "${aws_default_vpc.main.id}"

    ingress {
        from_port   = 80
        to_port     = 8888
        protocol    = "tcp"
        cidr_blocks = ["0.0.0.0/0"]
    }

    egress {
        from_port   = 0
        to_port     = 0
        protocol    = "-1"
        cidr_blocks = ["0.0.0.0/0"]
    }

    tags = {
        Name = "allow_http",
        Description = "Allow HTTP Security Group",
        Type = "security_group"
    }
}

resource "aws_security_group" "allow_ssh" {
    name   = "allow_ssh"
    vpc_id = "${aws_default_vpc.main.id}"

    ingress {
        from_port   = 22
        to_port     = 22
        protocol    = "tcp"
        cidr_blocks = ["0.0.0.0/0"]
    }

    tags = {
        Name = "allow_ssh",
        Description = "Allow SSH Security Group",
        Type = "security_group"
    }
}
