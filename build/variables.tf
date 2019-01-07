variable "instance" {
    description = "instance definitions"
    type        = "map"

    default = {
        name        = "ingresse-api"
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
        id = "ami-0497b4f776005706d"
    }
}

variable "load_balancer" {
    description = "load balancer informations"
    type        = "map"

    default = {
        name = "ingresse-api-lb"
        type = "application"
    }
}

variable "target_group" {
    description = "ingresse target group"
    type        = "map"

    default {
        arn  = ""
        name = "ingresse-api-tg"
    }
}

variable "vpc_id" {
    type    = "string"
    default = "vpc-75eba712"   
}
