import openstack 

conn = openstack.connect(cloud='admin')

security_group = conn.network.create