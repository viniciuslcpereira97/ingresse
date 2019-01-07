resource "aws_security_group" "allow_http" {
    name   = "allow_http"
    vpc_id = "${var.vpc_id}"

    ingress {
        from_port = 0
        to_port   = 0
        protocol  = "tcp"
        cidr_blocks = ["0.0.0.0/0"]
    }
}
