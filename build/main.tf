resource "aws_instance" "ingresse_api" {
    ami                         = "${var.ami["id"]}"
    instance_type               = "${var.instance["type"]}"
    monitoring                  = "${var.instance["monitoring"]}"
    key_name                    = "${var.instance["key"]}"
    subnet_id                   = "${aws_subnet.subnet_A.id}"
    associate_public_ip_address = true

    security_groups = [
        "${aws_security_group.allow_http.id}",
        "${aws_security_group.allow_ssh.id}"
    ]
}
