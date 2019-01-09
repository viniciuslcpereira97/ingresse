variable "instance" {
    description = "instance definitions"
    type        = "map"

    default = {
        name        = "ingresse_api"
        description = "ingresse api instance"
        type        = "t2.micro"
        monitoring  = true
        key         = "first-ec2"
    }
}

variable "ami" {
    description = "ami definitions"
    type        = "map"

    default = {
        id = "ami-0080165582b79aec0"
    }
}

variable "load_balancer" {
    description = "load balancer informations"
    type        = "map"

    default = {
        name = "ingresse-alb"
        type = "application"
    }
}

variable "availability_zone" {
    type    = "map"

    default = {
        region      = "us-east-1"
        primary   = "us-east-1a"
        secundary = "us-east-1c"
    }
}
